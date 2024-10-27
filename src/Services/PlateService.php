<?php 

namespace App\Services;

use App\Utils\Validator;
use App\Models\Plate;

class PlateService
{
    public static function create(array $data)
    {
        try {
            $fields = Validator::validate([
                'plate'=> $data['plate'] ?? '',
                'applicant'=> $data['applicant'] ?? '',
                'type'=> $data['type'] ?? '',
                'value'=> $data['value'] ?? '',
                'paymentMethod'=> $data['paymentMethod'] ?? ''
            ]);

            $plate = Plate::save($fields);

            if (!$plate) {
                return ['error' => 'We couldn\'t create your plate.'];
            }

            return "Plate created successfully!";

        } 
        catch (\PDOException $e) {

            if ($e->getCode() === 1049) {
                return ['error' => 'We couldn\'t connect to the database.'];
            }

            if ($e->getCode() === "23000") {
                return ['error' => 'Plate already exists.'];
            }

            if ($e->getCode() == "01000") {
                return ['error' => 'Invalid payment method.'];
            }

            if ($e->getCode() == 22001) {
                return ['error' => 'Some data exceeded size limits.'];
            }

            if ($e->getCode() == 22003) {
                return ['error' => '\'value\' is too big.'];
            }

            return ['error' => $e->getMessage()];
        }
        catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}