<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Job;
use Yii;

class JobsController extends \yii\web\Controller
{

    public function actionDetail($id)
    {
        $job = Job::find()->where(['id' => $id])->one();
        return $this->render('detail', ['job' => $job]);
    }

    public function actionCreate()
    {
        $job = new Job();

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
                $job->save();
                Yii::$app->getSession()->setFlash('success', 'Job added');
                return $this->redirect('/jobs');
            }
        }

        return $this->render('create', [
            'job' => $job,
        ]);
    }

    public function actionDelete($id)
    {
        $job = Job::findOne($id);
        $job->delete();
        Yii::$app->getSession()->setFlash('success', 'Job deleted');
        return $this->redirect('/jobs');
    }

    public function actionEdit($id)
    {
        $job = Job::find()->where(['id'=>$id])->one();

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
                $job->save();
                Yii::$app->getSession()->setFlash('success', 'Job details updated successfully!');
                return $this->redirect('/jobs');
            }
        }

        return $this->render('create', [
            'job' => $job,
        ]);
    }

    public function actionIndex($id = null)
    {
        if ($id == null) {
            $q = Job::find();
            $pagination = new Pagination([
                'defaultPageSize' => 30,
                'totalCount' => $q->count()
            ]);

            $jobs = $q->orderBy('create_date')->offset($pagination->offset)->limit($pagination->limit)->all();
            return $this->render('index', ['jobs' => $jobs, 'pagination' => $pagination]);   
        }elseif($id !== null){
            $jobs = Job::find()->where(['id' => $id])->all();           
            return $this->render('index', ['jobs' => $jobs]);
        }
    }

}
