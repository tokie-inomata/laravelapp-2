@extends('header_footer')

@section('link')
  <link rel="stylesheet" href="{{asset('/css/bords/create.css')}}"/>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('/js/bords/create.js')}}"></script>
@endsection

@section('title','トップページ')

@section('header')
  @parent
@endsection

@section('main')
  <div class='bords-create'>
    <div class='bords-create-sideBar'>
      <div class='bords-create-sideBar-majorItem'>
        @foreach( $big_category as $k => $val )
          @if($flg == $k)
            {{ $val }}
          @endif
        @endforeach
      </div>
      @foreach( $small_category as $k => $val)
        <a href="/bords/create" class="bords-create-sideBar-subItem-button">
          <div class='bords-create-sideBar-subItem-item'>
            {{ $val }}
          </div>
        </a>
      @endforeach
    </div>
    <div class='bords-create-mainBar'>
      <div class='bords-create-mainBar-postedContent'>
        <!-- ここを増やす -->
        @foreach( $bords as $k => $val )
          <div class='bords-create-mainBar-postedContent-box'>
            <div class='bords-create-mainBar-postedContent-box-name'>
                <span>{{ $val['id'] }}:
              </span>
              <span>{{ $val['name'] }}</span>
              <span>時間</span>
            </div>
            <div class='bords-create-mainBar-postedContent-box-comment'>
              <p>{{ $val['comment'] }}</p>
              <span id='reply-comment'>返信</span></br> 
              <div id='reply-commentBox'>
                <form action="" method="post" name="replyComment">
                  @csrf
                  <input type="text" name="replyComment" />
                  <input type="submit" value="返信" />
                </form>
              </div> 
              <span id='reply-display'>返信コメントの表示</span>
            </div>  
          </div>
        @endforeach
        <div class='bords-create-mainBar-pageRing'>
          ページリング
        </div>
      </div>
      <div class='bords-create-mainBar-postForm'>
        <form action="" method="post" name="mainComment">
          @csrf
          <p>名前</p>
          <input type="text" name="name" />
          <p>コメント</p>
          <textarea name="comment" rows="9" cols="80"></textarea></br>
          <input type="submit" value="送信" />
        </form>
      </div>
    </div>
  </div>
@endsection


@section('footer')
  @parent
@endsection