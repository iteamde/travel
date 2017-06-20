<?php

namespace App\Repositories\Backend\Embassies;

/* Embassies Models Start */
use App\Models\Embassies\Embassies;
use App\Models\Embassies\EmbassiesTranslations;
/* Embassies Models End */

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Backend\Access\Role\RoleRepository;

/**
 * Class EmbassiesRepository.
 */
class EmbassiesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Embassies::class;

    /**
     * @var RoleRepository
     */
    protected $role;

    /**
     * @param RoleRepository $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    /**
     * @param        $permissions
     * @param string $by
     *
     * @return mixed
     */
    public function getByPermission($permissions, $by = 'name')
    {
        if (! is_array($permissions)) {
            $permissions = [$permissions];
        }

        return $this->query()->whereHas('roles.permissions', function ($query) use ($permissions, $by) {
            $query->whereIn('permissions.'.$by, $permissions);
        })->get();
    }

    /**
     * @param        $roles
     * @param string $by
     *
     * @return mixed
     */
    public function getByRole($roles, $by = 'name')
    {
        if (! is_array($roles)) {
            $roles = [$roles];
        }

        return $this->query()->whereHas('roles', function ($query) use ($roles, $by) {
            $query->whereIn('roles.'.$by, $roles);
        })->get();
    }

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable()
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()
            // ->with('roles')
            ->with('transsingle')
            ->select([
                config('embassies.embassies_table').'.id',
                config('embassies.embassies_table').'.lat',
                config('embassies.embassies_table').'.lng',
                config('embassies.embassies_table').'.active'
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input , $extra)
    {
        $model                  = new Embassies;
        $model->countries_id    = $extra['country_id'];
        $model->active          = $extra['active'];
        $model->lat             = $extra['lat'];
        $model->lng             = $extra['lng'];

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {

                /* Store Different Translation of $this Embassies */
                foreach ($input as $key => $value) {
                    $trans = new EmbassiesTranslations;
                    $trans->embassies_id = $model->id;
                    $trans->languages_id = $key;
                    $trans->title        = $value['title_'.$key];
                    $trans->description  = $value['description_'.$key];
                    
                    if(!$trans->save()) {
                        $check = 0;
                    }
                }

                if($check){
                    return true;
                }
            }

            throw new GeneralException('Unexpected Error Occured!');
        });
    }

    
    /**
     * @param array $input
     */
    public function update($id , $model , $input , $extra)
    {
        $model                  = Embassies::findOrFail(['id' => $id]);
        $model                  = $model[0];
        $model->countries_id    = $extra['country_id'];
        $model->active          = $extra['active'];
        $model->lat             = $extra['lat'];
        $model->lng             = $extra['lng'];
        
        /* Delete Previous EmbassiesTranslations */
        $prev = EmbassiesTranslations::where(['embassies_id' => $id])->get();
        if(!empty($prev)){
            foreach ($prev as $key => $value) {
                $value->delete();
            }
        }

        DB::transaction(function () use ($model, $input, $extra) {
            $check = 1;
            
            if ($model->save()) {

                /* Store New Translations For $this Embassies */
                foreach ($input as $key => $value) {
                    $trans = new EmbassiesTranslations;
                    $trans->embassies_id = $model->id;
                    $trans->languages_id = $key;
                    $trans->title        = $value['title_'.$key];
                    $trans->description  = $value['description_'.$key];
            
                    if(!$trans->save()) {
                        $check = 0;
                    }
                }

                if($check){
                    return true;
                }
            }

            throw new GeneralException('Unexpected Error Occured!');
        });
    }
}
