<?php

namespace App\Http\Controllers;

class ResponseController extends Controller {

    /**
     * Función para unificar las respuestas satisfactorías de la API
     *
     * @param type $result object <b>ResultSet</b>
     * @param type $message string <b>Mensaje de respuesta</b>
     * @param type $code int <b>Código de respuestas HTTP</b>, default 200
     * @return json <b>Respuesta de la API en formato Json</b>
     */
    public function sendResponse($result, $message, $code = 200) {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    /**
     * Función para unificar las respuestas erróneas de la API
     *
     * @param type $error string <b>Mensaje de respuesta</b>
     * @param type $errorMessages array <b>Mensajes de error específicos</b>
     * @param type $code int <b>Código de respuestas HTTP</b>, default 404
     * @return json <b>Respuesta de la API en formato Json</b>
     */
    public function sendError($error, $errorMessages, $code = 404) {
        $response = [
            'success' => false,
            'message' => $errorMessages,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $error;
        }

        return response()->json($response, $code);
    }

    /**
     * Función para desunificar las respuestas satisfactorías de la funciones API internas
     *
     * @param type $result object <b>ResultSet</b>
     * @param type $message string <b>Mensaje de respuesta</b>
     * @param type $code int <b>Código de respuestas HTTP</b>, default 200
     * @return json <b>Respuesta de la API en formato Json</b>
     */
    public function dataResponseDecode($request) {
        $response = $request->getData();
        if ($request->status() === 200) {
            return $response->data;
        }
    }

}
