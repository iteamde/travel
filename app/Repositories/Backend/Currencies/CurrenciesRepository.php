<?php

namespace App\Repositories\Backend\Currencies;

use App\Models\Currencies\Currencies;
use App\Models\Currencies\CurrenciesTranslations;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Backend\Access\Role\RoleRepository;

/**
 * Class CurrenciesRepository.
 */
class CurrenciesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Currencies::class;

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
     * @param $permissions
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
                config('currencies.currencies_table').'.id',
                config('currencies.currencies_table').'.active'
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input, $active)
    {
        $model = new Currencies;
        $model->active = $active;

        DB::transaction(function () use ($model, $input) {
            $check = 1;
            
            if ($model->save()) {
                /* Save Currencies Translations */
                foreach ($input as $key => $value) {
                    
                    $trans = new CurrenciesTranslations;
                    $trans->currencies_id = $model->id;
                    $trans->languages_id = $key;
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
    public function update($id , $model , $input , $active)
    {
        $model = Currencies::findOrFail(['id' => $id]);
        $model = $model[0];
        $model->active = $active;

        $prev = CurrenciesTranslations::where(['currencies_id' => $id])->get();
        if(!empty($prev)){
            foreach ($prev as $key => $value) {
                $value->delete();
            }
        }

        DB::transaction(function () use ($model, $input) {
            $check = 1;
            
            if ($model->save()) {

                foreach ($input as $key => $value) {
                    
                    $trans = new CurrenciesTranslations;
                    $trans->currencies_id = $model->id;
                    $trans->languages_id = $key;
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
