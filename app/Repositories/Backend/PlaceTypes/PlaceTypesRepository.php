<?php

namespace App\Repositories\Backend\PlaceTypes;

use App\Models\PlaceTypes\PlaceTypes;
use App\Models\PlaceTypes\PlaceTypesTranslations;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Backend\Access\Role\RoleRepository;

/**
 * Class PlaceTypesRepository.
 */
class PlaceTypesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = PlaceTypes::class;

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
            ->with('transsingle')
            ->select([
                config('locations.place_types_table').'.id',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input)
    {
        $model = new PlaceTypes;
        
        DB::transaction(function () use ($model, $input) {
            $check = 1;
            
            if ($model->save()) {
                foreach ($input as $key => $value) {
                    $trans = new PlaceTypesTranslations;
                    $trans->place_types_ids = $model->id;
                    $trans->languages_ids = $key;
                    $trans->title        = $value['title_'.$key];
                    
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
    public function update($id , $model , $input)
    {
        $model = PlaceTypes::findOrFail(['id' => $id]);
        $model = $model[0];

        $prev = PlaceTypesTranslations::where(['place_types_ids' => $id])->get();
        if(!empty($prev)){
            foreach ($prev as $key => $value) {
                $value->delete();
            }
        }

        DB::transaction(function () use ($model, $input) {
            $check = 1;
            
            if ($model->save()) {
                foreach ($input as $key => $value) {
                    $trans = new PlaceTypesTranslations;
                    $trans->place_types_ids = $model->id;
                    $trans->languages_ids = $key;
                    $trans->title        = $value['title_'.$key];
                    
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
