<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalKinds;
use App\Helpers\Response\ResponseService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Exception;

class AnimalController extends Controller
{
    /**
     * Выводим списки всех типов животных
     * @return json
    */
    public function index(){
        try {
            $allAnimalsKind = AnimalKinds::get();
            return ResponseService::sendJsonResponse(
                true,
                Response::HTTP_OK,
                null,
                $allAnimalsKind
            );
        } catch (Exception $e) {
            return ResponseService::sendJsonResponse(
                false,
                Response::HTTP_BAD_REQUEST,
                ['message' => $e->getMessage()],
            );
        }
    }

    /**
     * Создаем новое животное и выводим на экран все созданные животные
     * @return json
    */
    public function create(Request $request){
        try {
            Animal::firstOrCreate(['kind' => $request->kind_id]);
            $allCreatedAnimals = Animal::with('kind_info')->get();
            return ResponseService::sendJsonResponse(
                true,
                Response::HTTP_OK,
                null,
                $allCreatedAnimals
            );
        } catch (Exception $e) {
            return ResponseService::sendJsonResponse(
                false,
                Response::HTTP_BAD_REQUEST,
                ['message' => $e->getMessage()],
            );
        }
    }

    /**
     * Просматриваем информацию о конкретном животном
     * @return json
    */
    public function show(Request $request, Animal $animal){
        try {
            $currentAnimal = Animal::where('name', $request->name)->with('kind_info')->firstOrFail();
            return ResponseService::sendJsonResponse(
                true,
                Response::HTTP_OK,
                null,
                $currentAnimal
            );
        } catch (Exception $e) {
            return ResponseService::sendJsonResponse(
                false,
                Response::HTTP_BAD_REQUEST,
                ['message' => $e->getMessage()],
            );
        }
    }

    /**
     * Обновляем возраст животного
     * @return json
    */
    public function update(Request $request){
        try {
            $allAnimals = Animal::with('kind_info')->get();
            foreach($allAnimals as $animal){
                if($animal->size >= $animal->kind_info->max_size || $animal->age >= $animal->kind_info->max_age){
                    throw new Exception('Животное выросло');
                }
                $animal->size = $animal->size*$animal->kind_info->growth_factor;
                $animal->age = $animal->age+5;
                $animal->save(); 
            }
            return ResponseService::sendJsonResponse(
                true,
                Response::HTTP_OK,
                null,
                $allAnimals
            );
        } catch (Exception $e) {
            return ResponseService::sendJsonResponse(
                false,
                Response::HTTP_BAD_REQUEST,
                ['message' => $e->getMessage()],
            );
        }
    }
}
