<?php

/* @var $this yii\web\View */
use dosamigos\datepicker\DatePicker;
$this->title = 'My Yii Application';

?>
<div class="site-index">
    <div class="form-wrapper">
        <form class="form-horizontal" ng-submit="submit()" ng-controller="FormController">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="formGroupInputLarge">Amount</label>
                <div class="col-sm-4">
                    <input class="form-control" type="number" id="formGroupInputLarge" placeholder="Amount" ng-model="amount">
                </div>
                <div class="col-sm-5">
                    <?= DatePicker::widget([
                        'model' => $model,
                        'attribute' => 'date',
                        'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-M-yyyy',
                        ],
                        'options' => [
                            'ng-model' =>'selectedDate'
                        ]
                    ]);?>
                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="descriptionTextarea">Description</label>
                <div class="col-sm-9">
                    <textarea id="descriptionTextarea" class="form-control" rows="10" ng-model="description"></textarea>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" id="submit" value="Submit" class="btn btn-success"/>
            </div>
        </form>
    </div>
    <!-- Start list section -->
    <div class="col-md-14">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Amount</td>
                    <td>Date</td>
                    <td>Description</td>
                </tr>
            </thead>
        </table>
    </div>
</div>
