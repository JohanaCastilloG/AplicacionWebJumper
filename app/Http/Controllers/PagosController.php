<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    public $ApiKey = '4Vj8eK4rloUd272L48hsrarnUA';
    public $merchant_id = '508029';
    
    public function formPay(Solicitud $solicitud)
    {
        return view('pagos.formpay', compact('solicitud'));
    }


    public function pay(Request $request, Solicitud $solicitud)
    {
        $contenido = json_encode([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'direccion2' => $request->direccion2,
            'city' => $request->city,
            'departamento' => $request->departamento,
            'postal' => $request->postal,
            'envio' => $request->envio,
        ]);

        $pago = Pago::create([
            'referencia' => 'PAGO'.$solicitud->id.'M'.$solicitud->matricula,
            'total' => $solicitud->valor,
            'contenido' => $contenido,
            'solicitud_id' => $solicitud->id
            ]);
        
        $domicilio = json_decode($pago->contenido);
        
        $referencia = $pago->referencia;

        $monto = $solicitud->valor;

        $signature = md5($this->ApiKey.'~'.$this->merchant_id.'~'.$referencia.'~'.$monto.'~'.'COP');

        return view('pagos.pay', compact('solicitud', 'pago', 'referencia', 'signature', 'domicilio'));
    }

    public function respuesta(Request $request)
    {

        $pagos = Pago::query()->where('referencia', $request->referenceCode);

        $pagos = $pagos->get();

        foreach ($pagos as $pago) {
            $solicitud = Solicitud::query()->where('id', $pago->solicitud_id);
        }

        $ApiKey = $this->ApiKey;
        $merchant_id = $request['merchantId'];
        $referenceCode = $request['referenceCode'];
        $TX_VALUE = $request['TX_VALUE'];
        $New_value = number_format($TX_VALUE, 1, '.', '');
        $currency = $request['currency'];
        $transactionState = $request['transactionState'];
        $firma_cadena = $ApiKey.'~'.$merchant_id.'~'.$referenceCode.'~'.$New_value.'~'.$currency.'~'.$transactionState;
        $firmacreada = md5($firma_cadena);
        $firma = $request['signature'];
        $reference_pol = $request['reference_pol'];
        $cus = $request['cus'];
        $extra1 = $request['description'];
        $pseBank = $request['pseBank'];
        $lapPaymentMethod = $request['lapPaymentMethod'];
        $transactionId = $request['transactionId'];
        $mensaje = $request['mensaje'];

        $respuesta = json_encode([
            'merchant_id' => $merchant_id,
            'referenceCode' => $referenceCode,
            'TX_VALUE' => $TX_VALUE,
            'currency' => $currency,
            'transactionState' => $transactionState,
            'firma_cadena' => $firma_cadena,
            'firmacreada' => $firmacreada,
            'firma' => $firma,
            'reference_pol' => $reference_pol,
            'cus' => $cus,
            'extra1' => $extra1,
            'pseBank' => $pseBank,
            'lapPaymentMethod' => $lapPaymentMethod,
            'transactionId' => $transactionId,
            'mensaje' => $mensaje,
        ]);

        $pago->update([
            'respuesta' => $respuesta
            ]);

        if ($request['transactionState'] == 4 ) {
            
            $solicitud->update([
                'estado' => 3
                ]);
        }

        // return redirect()->route('mispagos.show', $pago);

        return view('pagos.respuesta');
    }

    public function confirmacion()
    {
        return view('pagos.confirmacion');
    }
}
