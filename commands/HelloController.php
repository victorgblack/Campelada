<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }
    public function actionPermissoes(){
        $auth = Yii::$app->authManager;

        //remove todas as permissoes e papeis
        $auth->removeAll();

        //cria os papeis
        $usuario = $auth->createRole('usuario');
        $guest = $auth->createRole('guest');
        $admin = $auth->createRole('admin');
        $guest2 = $auth->createRole('guest2');

        //guarda os papeis dentro do sistema
        $auth->add($usuario);
        $auth->add($guest);
        $auth->add($admin);
        $auth->add($guest2);

        //admin
        $controles = ['usuario'];
        $permissoes = ['delete'];

        foreach ($controles as $controle) {
            foreach ($permissoes as $permissao) {
                //cria uma permissão
                $perm = $auth->createPermission($controle.ucfirst($permissao));
                //guarda a permissao no sistema
                $auth->add($perm);
                //da a permissão para o usuario
                $auth->addChild($admin,$perm);
            }
        }

        //usuario
        $controles = ['grupo','campeonato','equipe','jogo'];
        $permissoes = ['create','update','delete'];

        foreach ($controles as $controle) {
            foreach ($permissoes as $permissao) {
                //cria uma permissão
                $perm = $auth->createPermission($controle.ucfirst($permissao));
                //guarda a permissao no sistema
                $auth->add($perm);
                //da a permissão para o usuario
                $auth->addChild($usuario,$perm);
            }
        }
        
        //usuario atualiza seus dados
        $controles = ['usuario'];
        $permissoes = ['update','inicial','settings','view','index'];
        
        foreach ($controles as $controle) {
            foreach ($permissoes as $permissao) {
                //cria uma permissão
                $perm = $auth->createPermission($controle.ucfirst($permissao));
                //guarda a permissao no sistema
                $auth->add($perm);
                //da a permissão para o usuario
                $auth->addChild($usuario,$perm);
            }
        }


        //guest
        $controles = ['usuario'];
        $permissoes = ['create'];
        
        foreach ($controles as $controle) {
            foreach ($permissoes as $permissao) {
                //cria uma permissão
                $perm = $auth->createPermission($controle.ucfirst($permissao));
                //guarda a permissao no sistema
                $auth->add($perm);
                //da a permissão para o usuario
                $auth->addChild($guest,$perm);
            }
        }

        //guest search
        $controles = ['campeonato'];
        $permissoes = ['view','index','search'];
        
        foreach ($controles as $controle) {
            foreach ($permissoes as $permissao) {
                //cria uma permissão
                $perm = $auth->createPermission($controle.ucfirst($permissao));
                //guarda a permissao no sistema
                $auth->add($perm);
                //da a permissão para o usuario
                $auth->addChild($guest2,$perm);
            }
        }

        $auth->addChild($admin,$usuario);

        $auth->assign($admin,4);
    }
}
