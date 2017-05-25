<?php

namespace App\Repositories\Backend\Access\Languages;

use App\Models\Access\language\Languages;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LanguageRepository.
 */
class LanguagesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Languages::class;

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
            ->select([
                config('access.language_table').'.id',
                config('access.language_table').'.title',
                config('access.language_table').'.code',
                config('access.language_table').'.active'
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param array $input
     */
    public function create($input)
    {
        $this->checkUserByCode($input);

        $language = new Languages;
        $language->title  = $input['title'];
        $language->code   = $input['code'];
        $language->active = $input['active'];
        $language->save();
        return true;
    }

    /**
     * @param Model $user
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $language, array $input)
    {
        $input = $input['data'];

        $this->checkUserByCode($input);
        
        $language->title  = $input['title'];
        $language->code   = $input['code'];
        $language->active = $input['active'];

        DB::transaction(function () use ($language, $input) {
            if ($language->save()) {
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.language.update_error'));
        });
    }

    /**
     * @param  $input
     * @param  $user
     *
     * @throws GeneralException
     */
    protected function checkUserByCode($input)
    {
        //Check to see if Code exists
        if ($this->query()->where('code', '=', $input['code'])->first()) {
            throw new GeneralException(trans('exceptions.backend.access.language.code_error'));
        }
    }
}
