<?php

namespace backend\controllers;

use \yii\rest\Controller;
use common\models\Transaction;
use Yii;

class ApiController extends Controller {

    public function actionAddRecord($data = null) {
        $dataObject = json_decode($data);

        $transaction = new Transaction();
        $transaction->amount = $dataObject->amount;
        $dateTime = \DateTime::createFromFormat('d/m/Y', $dataObject->selectedDate);
        $transaction->date = $dateTime->getTimestamp();
        $transaction->description = $dataObject->description;

        if($transaction->save()) {
            return ['status' => 200, 'transaction' => $transaction];
        }
        else return ['status' => 'error'];
    }

    public function actionGetTransactions() {
        $transactions = Transaction::find()->all();
        if(!empty($transactions)) {
            return $transactions;
        }
        return null;
    }

}