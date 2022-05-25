@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/bower_components/summernote/dist/summernote-lite.min.css">

    <div class="container">
        <h2>게시글 상세</h2>

        <div class="board mt-3">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="row" id="board_head">
                        <div class="d-flex justify-content-between col-11">

                            <h3>{{$board->subject}}</h3>
                            <span class="text-right">{{$board->created_at}}</span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-11" id="contents">


                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>

        </div>



    </div>


    <script src="/bower_components/summernote/dist/summernote-lite.min.js"></script>
    <script>

        // db에 저장된 값을 html 태그로 치환
        function toReplace(str) {

            if(str == null) {
                return null;
            }

            var returnStr = str;

            returnStr = returnStr.replaceAll("<br>", "\n");
            returnStr = returnStr.replaceAll("&gt;", ">");
            returnStr = returnStr.replaceAll("&lt;", "<");
            returnStr = returnStr.replaceAll("&quot;", "");
            returnStr = returnStr.replaceAll("&nbsp;", " ");
            returnStr = returnStr.replaceAll("&amp;", "&");

            return returnStr;
        }

        $(document).ready(function() {



            //여기 아래 부분
            var contents='{{$board->contents}}';

            document.getElementById('contents').innerHTML=toReplace(contents);


        });
    </script>
@endsection
