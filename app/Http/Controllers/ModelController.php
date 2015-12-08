<?php

namespace App\Http\Controllers;

use App\Services\KundenMeisterService;
use Exception;
use Illuminate\Http\Request;
use SDK\Exceptions\Remote\InvalidOperationException;

class ModelController extends Controller {
    private $sdk;

    public function __construct(KundenMeisterService $sdk) {
        $this->sdk = $sdk;
    }


    public function index(Request $request) {
        return view("dashboard.models.index", array(
            'models' => $this->sdk->repositories()->models()->getModels(0, 100, $request->get("where"))
        ));
    }
    public function export() {

    }

    public function details($modelName) {
        return view('dashboard.models.details', [
            'model' => $this->sdk->repositories()->models()->getModel($modelName)
        ]);
    }

    public function delete($modelName) {
        try {
            $result = $this->sdk
                ->repositories()
                ->models()
                ->deleteModel($modelName);
        } catch (Exception $e) {

        }

        if(!isset($result) || !$result)
            return redirect()->back()->with('error', 'Unable to delete model!');

        return redirect()->route('dashboard.model')->with('success', 'Model deleted!');

    }

    public function add() {
        return view('dashboard.models.add');
    }
    public function insert(Request $request) {
        try {
            $result = $this->sdk
                ->repositories()
                ->models()
                ->insertModel($request->request->all());
        } catch (Exception $e) {

        }

        if(!isset($result) || !$result)
            return redirect()->back()->with('error', 'Unable to add model!');

        return redirect()->route('dashboard.model.details', ['modelName' => $result->modelName])->with('success', 'Model added!');
    }
}