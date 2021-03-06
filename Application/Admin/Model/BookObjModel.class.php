<?php
namespace Admin\Model;
use Think\Model;
class BookObjModel extends Model{
    protected $_scope=array(
        //书吧总图书量
        "count_total"=>array(
            "field"=>array("id"),
            "where"=>array("owner_id"=>"null"),
        ),
        //在借/归还图书总量
        "count_status"=>array(
            "field"=>array("id"),
            "where"=>array(
                "owner_id"=>"null",
                "status"=>1,
            ),
        ),
        //当前类型的图书总数
        "count_total_type"=>array(
            "field"=>array("id"),
            "where"=>array(
                "owner_id"=>"null",
                "type"=>"null",
            ),
        ),
        //当前类型在借/归还图书总量
        "count_status_type"=>array(
            "field"=>array("id"),
            "where"=>array(
                "owner_id"=>"null",
                "type"=>"null",
                "status"=>1,
            ),
        ),
        //当前日期的图书总数
        "count_total_time"=>array(
            "field"=>array("id"),
            "where"=>array(
                "owner_id"=>"null",
                "create_time"=>"null",
            ),
        ),
        //当前日期累计借出的图书总数
        "count_lend_time"=>array(
            "field"=>array("id"),
            "table"=>array(
                "t_book_obj"=>"a",
                "t_borrow_info"=>"b"
            ),
            "where"=>array(
                "a.owner_id"=>"null",
                "b.borrow_time"=>"null",
                "a.id=b.book_obj_id"
            ),
        ),
        //当前日期累计归还的图书总数
        "count_return_time"=>array(
            "field"=>array("a.id"),
            "table"=>array(
                "t_book_obj"=>"a",
                "t_borrow_info"=>"b"
            ),
            "where"=>array(
                "a.owner_id"=>"null",
                "b.return_time"=>"null",
                "a.id=b.book_obj_id"
            ),
        ),
        //计算一共在借/归还多少本这本书
        "count_total_book"=>array(
            "field"=>array("id"),
            "where"=>array(
                "owner_id"=>"null",
                "book_id"=>"null",
                "status"=>1,
            ),
        ),
        //计算一共多少本这本书
        "count_status_book"=>array(
            "field"=>array("id"),
            "where"=>array(
                "owner_id"=>"null",
                "book_id"=>"null",
            ),
        ),
        //所在书吧的图书类型
        "book_type"=>array(
            "field"=>array("id"),
            "where"=>array("owner_id"=>"null"),
            "group"=>"type",
        ),
        //查询书吧里所有这本书
        "bar_book_lists"=>array(
            "field"=>array("id","book_code","create_time","owner_type","o_n","mail","status"),
            "where"=>array(
                "owner_id"=>"null",
                "book_id"=>"null",
                "book_code"=>array("like","%%"),
            ),
            "order"=>array(
                "status"=>"desc",
                "create_time"=>"desc"
            )
        ),
        //对图书进行分组分页查询（同种书归为一类）
        "book_lists"=>array(
            "field"=>array("b.id","b.images_medium","b.title","b.author","a.type","b.summary","count(*)"=>"count","sum(a.status=1)"=>"borrow"),
            "table"=>array(
                "t_book_obj"=>"a",
                "t_book_info"=>"b",
            ),
            "where"=>array(
                "owner_id"=>"null",
                "b.title"=>array("like","%%"),
                "a.type"=>array("like","%%"),
                "a.book_id= b.id"
            ),
            "group"=>"b.id",
            "order"=>array(
                "sum(a.status=1)"=>"desc",
            )
        ),
        //分组后的数据总数
        "count_total_page"=>array(
            "field"=>array("b.id"),
            "table"=>array(
                "t_book_obj"=>"a",
                "t_book_info"=>"b",
            ),
            "where"=>array(
                "owner_id"=>"null",
                "b.title"=>array("like","%%"),
                "a.type"=>array("like","%%"),
                "a.book_id= b.id"
            ),
            "group"=>"b.id",
        ),
    );
}