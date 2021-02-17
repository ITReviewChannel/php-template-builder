<?php

namespace ITReview;

/**
 * Строитель.
 *
 * @package ITReview
 */
final class SqlBuilder
{
    /**
     * @var string $sql SQL-запрос.
     */
    private string $sql;

    /**
     * Конструктор.
     */
    public function __construct()
    {
        $this->sql = '';
    }

    /**
     * Добавление блока выборки.
     *
     * @param string $fields Запрашиваемые поля.
     * @return $this
     */
    public function select(string $fields): SqlBuilder
    {
        $this->sql .= 'SELECT ' . $fields;

        return $this;
    }

    /**
     * Добавление блока указания таблицы.
     *
     * @param string $table Наименование таблицы.
     * @return $this
     */
    public function from(string $table): SqlBuilder
    {
        $this->sql .= ' FROM ' . $table;

        return $this;
    }

    /**
     * Добавление блока условий выборки.
     *
     * @param string $conditions Условия.
     * @return $this
     */
    public function where(string $conditions): SqlBuilder
    {
        $this->sql .= ' WHERE ' . $conditions;

        return $this;
    }

    /**
     * Генерация запроса.
     *
     * @return string
     */
    public function generateSQL(): string
    {
        return $this->sql . ';';
    }
}


$builder = new SqlBuilder();
$sql = $builder->select('id, name, surname, age')
    ->from('user')
    ->where('age > 20')
    ->generateSQL();

echo $sql;
