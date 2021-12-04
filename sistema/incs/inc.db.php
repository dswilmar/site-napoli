<?php

function abrir_conexao() {

    $db = DB_TYPE;
    $servidor = DB_HOST;
    $usuario = DB_USER;
    $senha = DB_PASS;
    $bd = DB_NAME;

    try {
        $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $conexao = new PDO("{$db}:host={$servidor};dbname={$bd}", $usuario, $senha, $opcoes);
        return $conexao;        
    } catch(Exception $ex) {
        header('Content-type: text/html; charset=utf-8');
        exit("<h2>".$ex->getMessage()."</h2>");
    }

}

function selecionar_dados($sql, $parametros = null) {

    $itens = array();
        
    $obj = abrir_conexao()->prepare($sql);
    
    if ($parametros != null) {
            if (count($parametros) > 0) {
            foreach ($parametros as $key => $value) {
                $obj->bindValue($key, $value);
            }
        }
    }
    
    $obj->execute();        
    
    while ($lista = $obj->fetch(PDO::FETCH_ASSOC)) {
        array_push($itens, $lista);
    }
    
    return $itens;
}

function exec_sql($sql, $parametros = null) {

    $pdo = abrir_conexao();
    $obj = $pdo->prepare($sql);
    if ($parametros != null) {
        if (count($parametros) > 0) {
            foreach ($parametros as $key => $value) {
                $obj->bindValue($key, $value);
            }
        }
    }
    
    $obj->execute();
    return $pdo->lastInsertId();
}


function exists($tabela, $where) {
    
    $sql = "SELECT COUNT(*) AS qtd FROM ".$tabela." WHERE ".$where;    
    $dados = selecionar_dados($sql);
    
    if($dados[0]['qtd'] > 0) {
        return true;
    } else {
        return false;
    }
}

function db_count($tabela, $params) {
    
    if ($params != null) {
        
        $sql = "SELECT COUNT(*) AS qtd FROM ".$tabela." WHERE ";

        //buscar o último parametro passado
        end($params);
        $ultimoParam = key($params);

        foreach ($params as $param => $valor) {
            
            if ($param != $ultimoParam) {
                $sql .= $param ."= :" . $param . " AND ";
            } else {
                $sql .= $param ."= :" . $param;
            }

        }

        if ($limit != null && $offset != null) {
            $sql .= " LIMIT " . $limit . ", " . $offset;
        }

        $dados = selecionar_dados($sql, $params);

    } else {
        $sql = "SELECT COUNT(*) AS qtd FROM ".$tabela;

        $dados = selecionar_dados($sql);
    }

    return $dados[0]['qtd'];
}

function db_get($tabela, $params = null) {

    $dados = array();
    
    if ($params != null) {
        
        $sql = "SELECT * FROM ".$tabela." WHERE ";

        //buscar o último parametro passado
        end($params);
        $ultimoParam = key($params);

        foreach ($params as $param => $valor) {
            
            if ($param != $ultimoParam) {
                $sql .= $param ."= :" . $param . " AND ";
            } else {
                $sql .= $param ."= :" . $param;
            }

        }

        $dados = selecionar_dados($sql, $params);

    } else {
        $sql = "SELECT * FROM ".$tabela;

        $dados = selecionar_dados($sql);
    }

    return $dados;

}

function db_exists($tabela, $params) {

    $numReg = 0;
    $sql = "SELECT COUNT(*) AS qtd FROM ".$tabela." WHERE ";
    
    //buscar o último parametro passado
    end($params);
    $ultimoParam = key($params);

    foreach ($params as $param => $valor) {
        
        if ($param != $ultimoParam) {
            $sql .= $param ."= :" . $param . " AND ";
        } else {
            $sql .= $param ."= :" . $param;
        }

    }

    $dados = selecionar_dados($sql, $params);
    $numReg = $dados[0]['qtd'];

    if ($numReg > 0) {
        return true;
    } else {
        return false;
    }

}

function db_insert($tabela, $params) {

    $campos = '';
    $valores = '';

    end($params);
    $ultimoParam = key($params);

    foreach ($params as $param => $valor) {
        
        if ($param != $ultimoParam) {
            $campos .= $param . ', ';
            $valores .= ':' . $param . ', ';
        } else {
            $campos .= $param;
            $valores .= ':' . $param;
        }

    }

    $sql = "INSERT INTO ".$tabela."(".$campos.") VALUES (".$valores.")";

    try {
        exec_sql($sql, $params);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

function db_update($tabela, $params, $condicao = null) {

    $sql = "UPDATE ".$tabela." SET ";

    //buscar o último parametro passado
    end($params);
    $ultimoParam = key($params);

    foreach ($params as $param => $valor) {
        
        if ($param != $ultimoParam) {
            $sql .= $param ."= :" . $param . ", ";
        } else {
            $sql .= $param ."= :" . $param;
        }

    }

    if ($condicao != null) {

        $sql .= " WHERE ";

        //buscar a última condicao passada
        end($condicao);
        $ultimaCond = key($condicao);

        foreach ($condicao as $cond => $valor) {
            
            if ($cond != $ultimaCond) {
                $sql .= $cond ."= :" . $cond . " AND ";
            } else {
                $sql .= $cond ."= :" . $cond;
            }

        }

    }

    $params = array_merge($params, $condicao);
    exec_sql($sql, $params);
}

function db_delete($tabela, $condicao = null) {

    $sql = "DELETE FROM ".$tabela;

    if ($condicao != null) {

        $sql .= " WHERE ";

        //buscar a última condicao passada
        end($condicao);
        $ultimaCond = key($condicao);

        foreach ($condicao as $cond => $valor) {
            
            if ($cond != $ultimaCond) {
                $sql .= $cond ."= :" . $cond . " AND ";
            } else {
                $sql .= $cond ."= :" . $cond;
            }

        }

        exec_sql($sql, $condicao);

    } else {

        exec_sql($sql); 
    }

    
}