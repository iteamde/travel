<?php

namespace App\Repositories\Backend\Pages;

use App\Models\Pages\Pages;
use App\Models\Pages\PagesTranslations;
use App\Models\Pages\PagesMedias;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Backend\Access\Role\RoleRepository;

/**
 * Class PagesRepository.
 */
class PagesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Pages::class;

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
                config('pages.pages_table').'.id',
                config('pages.pages_table').'.active'
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input , $extra)
    {
        $model = new Pages;
        $model->active = $extra['active'];
        $model->url = $extra['url'];

        DB::transaction(function () use ($model, $input , $extra) {
            $check = 1;
            
            if ($model->save()) {
                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                        $PagesMedias = new PagesMedias;
                        $PagesMedias->pages_ids = $model->id;
                        $PagesMedias->medias_ids = $value;
                        $PagesMedias->save();
                    }
                }

                /* Save Pages Translations */
                foreach ($input as $key => $value) {
                    $trans = new PagesTranslations;
                    $trans->pages_id = $model->id;
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
        $model          = Pages::findOrFail(['id' => $id]);
        $model          = $model[0];
        $model->active  = $extra['active'];
        $model->url     = $extra['url'];

        $prev = PagesTranslations::where(['pages_id' => $id])->get();
        if(!empty($prev)){
            foreach ($prev as $key => $value) {
                $value->delete();
            }
        }

        $prevMedias = PagesMedias::where(['pages_ids' => $id])->get();
        if(!empty($prevMedias)){
            foreach ($prevMedias as $key => $value) {
                $value->delete();
            }
        }

        DB::transaction(function () use ($model, $input , $extra) {
            $check = 1;
            
            if ($model->save()) {
                
                if(!empty($extra['medias'])){
                    foreach ($extra['medias'] as $key => $value) {
                        $PagesMedias = new PagesMedias;
                        $PagesMedias->pages_ids = $model->id;
                        $PagesMedias->medias_ids = $value;
                        $PagesMedias->save();
                    }
                }

                /* Save Page Translations */
                foreach ($input as $key => $value) {
                    $trans = new PagesTranslations;
                    $trans->pages_id = $model->id;
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
