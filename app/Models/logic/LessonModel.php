<?php
namespace App\Models\logic;

use App\Models\dao\LessonDao;
use App\Models\data\biz\LessonBiz;

class LessonModel
{
    public function create($form)
    {
        $dao = new LessonDao($form->toArray());
        if ($dao->save()) {
            $biz = new LessonBiz($dao->toArray());
            return $biz;
        } else {
            return false;
        }
    }

    public function update($form)
    {
        $dao = LessonDao::find($form->id);
        $dao->name = $form->name;
        $dao->updated_at = time();
        if ($dao->update()) {
            $biz = new LessonBiz($dao->toArray());
            return $biz;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $dao = LessonDao::find($id);
        return $dao->delete();
    }
}