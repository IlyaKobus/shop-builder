<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 11:40
 */

namespace App\Modules\Currency\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Currency\DataTables\CurrencyDataTable;
use App\Modules\Currency\Http\Requests\CreateCurrencyRequest;
use App\Modules\Currency\Http\Requests\UpdateCurrencyRequest;
use App\Modules\Currency\Models\Currency;
use Szykra\Notifications\Flash;

class CurrencyController extends Controller
{
    /**
     * @param CurrencyDataTable $dataTable
     * @return mixed
     */
    public function index(CurrencyDataTable $dataTable)
    {
        return $dataTable->render('dashboard.currency.index');
    }

    /**
     * @param Currency $currency
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Currency $currency)
    {
        return view('dashboard.currency.edit', compact('currency'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.currency.create');
    }

    /**
     * @param CreateCurrencyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCurrencyRequest $request)
    {
        Currency::create($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Currency created');

        return redirect()->route('currencies.index');
    }

    /**
     * @param UpdateCurrencyRequest $request
     * @param Currency $currency
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        $currency->fill($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Currency edited');

        return redirect()->route('currencies.index');
    }

    /**
     * @param Currency $currency
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        Flash::success('Currency deleted');

        return redirect()->route('currencies.index');
    }
}
