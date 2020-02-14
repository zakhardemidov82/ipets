<?php


namespace app\commands;

use Yii;
use yii\console\Controller;
/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {
        $auth = Yii::$app->authManager;

        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...

        // Создадим роли админа, модератора и редактора  данных
        $admin = $auth->createRole('admin');
        $moderator = $auth->createRole('moderator');
        $editor = $auth->createRole('editor');

        // запишем их в БД
        $auth->add($admin);
        $auth->add($moderator);
        $auth->add($editor);

        /// Создаем наше правило, которое позволит проверить автора информации
        $moderatorRule = new \app\rbac\AuthorRule;

        // Запишем его в БД
        $auth->add($moderatorRule);

        // Создаем разрешения. Например, просмотр админки viewAdminPage и редактирование данных updateNews
        $viewSuperAdminPage = $auth->createPermission('viewSuperAdminPage');
        $viewSuperAdminPage->description = 'Просмотр админки приложения';

        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'Просмотр админки клуба';

        $updateData = $auth->createPermission('updateData');
        $updateData->description = 'Редактирование информации';

        // Создадим еще новое разрешение «Редактирование данных своего клуба» и ассоциируем его с правилом AuthorRule
        $updateOwnData = $auth->createPermission('updateOwnData');
        $updateOwnData->description = 'Редактирование данных своего клуба';

        // Указываем правило AuthorRule для разрешения updateOwnData.
        $updateOwnData->ruleName = $moderatorRule->name;

        // Запишем все разрешения в БД
        $auth->add($viewSuperAdminPage);
        $auth->add($viewAdminPage);
        $auth->add($updateData);
        $auth->add($updateOwnData);

        // Теперь добавим наследования.


        // Роли «Редактор» присваиваем разрешение «Редактирование данные, которые он сам внёс»
        $auth->addChild($editor,$updateOwnData);

        // Роли «Редактор» присваиваем разрешение «Может смотреть админку своего клуба»
        $auth->addChild($editor,$viewAdminPage);

        // Роли «Модератор» присваиваем разрешение «Редактирование данные, которые он сам внёс»
        $auth->addChild($moderator,$updateOwnData);

        // Роли «Модератор» присваиваем разрешение «Редактирование данные по своему клубу»
        $auth->addChild($moderator,$updateData);

        // Роли «Модератор» присваиваем разрешение «Может смотреть админку своего клуба»
        $auth->addChild($moderator,$viewAdminPage);

        // админ имеет собственное разрешение - «Редактирование данных»
        $auth->addChild($admin, $updateData);

        // Еще админ имеет собственное разрешение - «Просмотр админки приложения»
        $auth->addChild($admin, $viewSuperAdminPage);

        // Еще админ имеет собственное разрешение - «Просмотр админки любого клуба, через его id»
        $auth->addChild($admin, $viewAdminPage);




        // Назначаем роль admin пользователю с ID 1
        //$auth->assign($admin, 1);

        // Назначаем роль editor пользователю с ID 2
        // $auth->assign($moderator, 2);
    }
}