<?php


use App\Book;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class BookTabelSeeder extends Seeder
{
    public function run()
    {
        $isbn_list=["7505715666","7532738159","9787508653167","9787560633503","9787040406641","9787302089797","9787513331036"];
        //插入真数据
        foreach ($isbn_list as $isbn) {
            $this->getBooks($isbn);
        }
    }

    protected function getBooks($isbn)
    {
        $url='https://api.douban.com/v2/book/isbn/'.$isbn.'?apikey=0df993c66c0c636e29ecbb5344252a4a';
        $re=file_get_contents($url);
        $re=json_decode($re);
        print_r($re->summary);
        try {
            DB::table('books')->insert([
                'book_ibsn10' => $re->isbn10,
                'book_ibsn13' => $re->isbn13,
                "book_name" => $re->title,
                "book_publisher" => $re->publisher,
                "book_version" => "",
                "book_publish_year" => $re->pubdate,
                "book_market_price"=>$re->price,
                "book_author_name"=>$re->author[0],
                "book_pic_small"=>$re->images->small,
                "book_pic_large"=>$re->images->large,
                "book_summary"=>$re->summary
            ]);
        } catch (Illuminate\Database\QueryException $e) {
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                print_r($re->title . $isbn . 'this book is already in database');
                return;
            }
        }
    }
}