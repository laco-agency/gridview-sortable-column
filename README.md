# Yii2 GridView Sortable Column

Позволяет производить сортировку строк таблиц GridView перетаскиванием мышкой.

## Usage
Добавить настройку

Подключаем поведение к модели. В свойстве orderAttribute можно указать название столбца, по которому будет производиться сортировка.
По умолчанию, значение orderAttribute равно sort_order

```php
public function behaviors()
{
    return [
        'sortable' => [
            'class' => \laco\sortable\Behaviour::className(),
            'orderAttribute' => 'sort_order',
        ],
    ];
}
```

К одному контроллеру можно подключить сразу несколько действий сортировки и в каждом из них указать собственные настройки.
Если свойство orderAttribute не указано, то будет использоваться значение указанное при подключении Поведения сортировки к модели.

```php
public function actions()
    {
        return [
            'sorting-one' => [
                'class' => \laco\sortable\Action::className(),
                'modelClass' => YourModel::className(),
                'orderAttribute' => 'sort_order_one'
            ],
            'sorting-two' => [
                'class' => \laco\sortable\Action::className(),
                'modelClass' => YourModel::className(),
                'orderAttribute' => 'sort_order_two
            ],   
                     
        ];
    }
```

Добавить в GridView столбец сортировка:

```php
echo \yii\grid\GridView::widget([
    'dataProvider' => $model->search(),
    'rowOptions' => function ($model, $key, $index, $grid) {
        return ['data-sortable-id' => $model->id];
    },
    'columns' => [

        [
            'class' => \laco\sortable\Column::className(),
            'url' => \yii\helpers\Url::toRoute(['controller/sorting-action'])
        ],
    ],
    'options' => [
        'data' => [
            'sortable-widget' => 1
        ]
    ],
]);
```
