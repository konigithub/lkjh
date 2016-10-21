<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fee".
 *
 * @property string $id
 * @property string $feedate
 * @property string $money
 * @property integer $cid
 * @property integer $remark
 */
class Fee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feedate', 'money', 'cid'], 'required'],
            [['feedate'], 'safe'],
            [['money'], 'number'],
            [['cid', 'remark'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feedate' => '消费日期',
            'money' => '消费金额',
            'cid' => '消费类型',
            'remark' => '说明',
        ];
    }

    /**
     * @inheritdoc
     * @return FeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FeeQuery(get_called_class());
    }
}
