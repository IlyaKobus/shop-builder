<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 12:52
 */

namespace App\Modules\Payment\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Payment\DataTables\PaymentDataTable;
use App\Modules\Payment\Http\Requests\CreatePaymentRequest;
use App\Modules\Payment\Http\Requests\UpdatePaymentRequest;
use App\Modules\Payment\Models\Payment;
use Szykra\Notifications\Flash;

class PaymentController extends Controller
{
    /**
     * @param PaymentDataTable $dataTable
     * @return mixed
     */
    public function index(PaymentDataTable $dataTable)
    {
        return $dataTable->render('dashboard.payment.index');
    }

    /**
     * @param Payment $payment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Payment $payment)
    {
        return view('dashboard.payment.edit', compact('payment'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.payment.create');
    }

    /**
     * @param CreatePaymentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePaymentRequest $request)
    {
        Payment::create($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Payment created');

        return redirect()->route('payments.index');
    }

    /**
     * @param UpdatePaymentRequest $request
     * @param Payment $payment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->fill($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Payment edited');

        return redirect()->route('payments.index');
    }

    /**
     * @param Payment $payment
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        Flash::success('Payment deleted');

        return redirect()->route('payments.index');
    }
}
