<?php

namespace App\Http\Controllers;

use App\Book;
use App\ReleasedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $book = new Book();
        $releasedBook = new ReleasedBook();
        $recommendBooks = $book->getRecommendBook();
        //books中模糊搜索
        $where =function($query)use ($request){
            if($request->has('keyword') and $request->keyword!=''){
                $search ="%".$request->keyword."%";
                $query->where('book_name','like',$search);
            }
        };
        $books =Book::where($where)->paginate(5);
        //releasedbooks中模糊搜索
        $newwhere=function($query)use ($request,$books){
            if($request->has('keyword') and $request->keyword!=''){
                $search ="%".$request->keyword."%";
                $query->where('book_id',$books[0]->book_id);
            }
        };
        $releasedBooks=ReleasedBook::where($newwhere)->paginate(5);

        return view('book.index',["recommendBooks"=>$recommendBooks,
            "books"=>$books,"releasedBooks"=>$releasedBooks]);
    }
    /**
     * 添加书籍到“想要”清单
     *
     * @return \Illuminate\Http\Response
     */
    public function addBookToWishList($book_id,Request $request)
    {
        //making sure if the book requested exists, otherwise, we throw a http exception
        try {
            $book = Book::findOrFail($book_id);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException();
        }
        $user = \Auth::user();
        //检查用户是否登陆
        if($user){
            //检查是否
            foreach($user->collectedBooks as $collectedBook){
                if($collectedBook->book_id == $book_id){
                    session()->flash('success', '该书籍已添加至心愿单，请勿重复操作');
                    return redirect()->back();
                }
            }
            $user->collectedBooks()->attach($book_id);
            session()->flash('success', '该书籍成功添加至心愿单');
            return redirect()->back();
        }
        else{
            return redirect()->route('login');
        }

    }
    /**
     * 添加发布书籍到“想要”清单
     *
     * @return \Illuminate\Http\Response
     */
    public function addReleasedBookToWishList($released_book_id,Request $request)
    {
        //making sure if the book requested exists, otherwise, we throw a http exception
        try {
            $book = ReleasedBook::findOrFail($released_book_id);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException();
        }
        $user = \Auth::user();
        //检查用户是否登陆
        if($user){
            //检查是否
            foreach($user->collectedReleasedBooks as $collectedBook){
                if($collectedBook->released_book_id == $released_book_id){
                    session()->flash('success', '该商品已添加至心愿单，请勿重复操作');
                    return redirect()->back();
                }
            }
            $user->collectedReleasedBooks()->attach($released_book_id);
            session()->flash('success', '该商品成功添加至心愿单');
            return redirect()->back();
        }
        else{
            return redirect()->route('login');
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->getBooks($request['isbn']);
        $this->getmybooks($request);
        return view('book.show');
    }
    protected function getmybooks($request){

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
    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
