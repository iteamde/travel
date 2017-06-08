<?php

namespace App\Http\Controllers\Backend\Currencies;

use App\Models\Currencies\Currencies;
use App\Models\Currencies\CurrenciesTranslations;
use App\Http\Controllers\Controller;
use App\Models\Access\language\Languages;
use App\Http\Requests\Backend\Currencies\ManageCurrenciesRequest;
use App\Http\Requests\Backend\Currencies\StoreCurrenciesRequest;
use App\Repositories\Backend\Currencies\CurrenciesRepository;

class CurrenciesController extends Controller
{
    protected $currencies;

    public function __construct(CurrenciesRepository $currencies)
    {
        $this->currencies = $currencies;
        $this->languages = \DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
    }

     /**
     * @param ManageCurrenciesRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageCurrenciesRequest $request)
    {
        return view('backend.currencies.index');
    }

    /**
     * @param ManageCurrenciesRequest $request
     *
     * @return mixed
     */
    public function create(ManageCurrenciesRequest $request)
    {   
       
        return view('backend.currencies.create',[
        ]);
    }

    /**
     * @param StoreCurrenciesRequest $request
     *
     * @return mixed
     */
    public function store(StoreCurrenciesRequest $request)
    {   
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $active = 2;

        if($request->input('active') == 1){
            $active = 1;
        }else{
            $active = 2;
        }

        $this->currencies->create($data,$active);

        return redirect()->route('admin.currencies.currencies.index')->withFlashSuccess('Currencies Created!');
    }

    /**
     * @param Currencies $id
     * @param ManageCurrenciesRequest $request
     *
     * @return mixed
     */
    public function delete($id, ManageCurrenciesRequest $request)
    {      
        $item = Currencies::findOrFail($id);
        /* Delete Children Tables Data of this currency */
        $child = CurrenciesTranslations::where(['currencies_id' => $id])->get();
        if(!empty($child)){
            foreach ($child as $key => $value) {
                $value->delete();
            }
        }
        $item->delete();

        return redirect()->route('admin.currencies.currencies.index')->withFlashSuccess('Currencies Deleted Successfully');
    }

    /**
     * @param Currencies $id
     * @param ManageCurrenciesRequest $request
     *
     * @return mixed
     */
    public function edit($id, ManageCurrenciesRequest $request)
    {   
        
        $data = [];
        $currencies = Currencies::findOrFail(['id' => $id]);
        $currencies = $currencies[0];

        foreach ($this->languages as $key => $language) {
            $model = CurrenciesTranslations::where([
                'languages_id' => $language->id,
                'currencies_id'   => $id
            ])->get();

            $data['title_'.$language->id] = $model[0]->title;   
        }

        $data['active'] = $currencies->active;

        return view('backend.currencies.edit')
            ->withLanguages($this->languages)
            ->withCurrencies($currencies)
            ->withCurrenciesid($id)
            ->withData($data);
    }

    /**
     * @param Currencies $id
     * @param ManageCurrenciesRequest $request
     *
     * @return mixed
     */
    public function update($id, ManageCurrenciesRequest $request)
    {   
        $currencies = Currencies::findOrFail(['id' => $id]);
        $post = $request->input();
        
        $data = [];
        
        foreach ($this->languages as $key => $language) {
            $data[$language->id]['title_'.$language->id] = $request->input('title_'.$language->id);
        }

        $active = 2;

        if( isset($post['active'])){
            $active = 1;
        }else{
            $active = 2;
        }

        $this->currencies->update($id , $currencies, $data , $active);
        
        return redirect()->route('admin.currencies.currencies.index')
            ->withFlashSuccess('Currencies updated Successfully!');
    }

    /**
     * @param Currencies  $id
     * @param ManageCurrenciesRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageCurrenciesRequest $request)
    {   
        $currencies = Currencies::findOrFail(['id' => $id]);
        $currenciesTrans = CurrenciesTranslations::where(['currencies_id' => $id])->get();
        $currencies = $currencies[0];
       
        return view('backend.currencies.show')
            ->withCurrencies($currencies)
            ->withCurrenciestrans($currenciesTrans);
    }

    /**
     * @param Currencies $currency
     * @param $status
     * @param ManageCurrencyRequest $request
     *
     * @return mixed
     */
    public function mark(Currencies $currencies, $status, ManageCurrenciesRequest $request)
    {
        $currencies->active = $status;
        $currencies->save();
        return redirect()->route('admin.currencies.currencies.index')
            ->withFlashSuccess('Currencies Status Updated!');
    }
}