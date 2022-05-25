@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/bower_components/summernote/dist/summernote-lite.min.css">

    <div class="container">
        <h2>글쓰기</h2>


        <form class="mt-3" action="{{route('board.store')}}" method="post" name="form1">
            @csrf
            <div class="form-group">

                <input type="text" class="form-control" name="subject" placeholder="제목을 입력해주세요.">

            </div>
            <div class="form-group">
                <textarea  id="summernote" name="contents"></textarea>
            </div>

            <div class="text-right">
                <button type="button" class="btn btn-danger" id="btnCancel">취소</button>
                <button type="button" class="btn btn-primary" id="btnSubmit">등록</button>
            </div>
        </form>



    </div>


    <script src="/bower_components/summernote/dist/summernote-lite.min.js"></script>
    <script>

        var routes = {
            list: "{!! route('board.list') !!}",
            store: "{!! route('board.store') !!}",
         //   detail: "{!! route('board.detail', ['id' => '']) !!}",
        };


        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400,                 // 에디터 높이
                minHeight: null,             // 최소 높이
                maxHeight: null,             // 최대 높이
                focus: true,                  // 에디터 로딩후 포커스를 맞출지 여부
                lang: "ko-KR",					// 한글 설정
                placeholder: '최대 2048자까지 쓸 수 있습니다.',	//placeholder 설정
                // callbacks: {
                //     onImageUpload: function (files) {
                //         // upload image to server and create imgNode...
                //         $summernote.summernote('insertNode', imgNode);
                //     }
                // }
            });

            $('#btnCancel').click(function () {
                if (confirm("글 작성을 취소하시겠습니까?")){
                   location.href=routes.list;
                }
            });

            $('#btnSubmit').click(function () {
                var subject= $('input[name=subject]');
                var contents= $('textarea[name=contents]');

                if(subject.val() == ''){
                    alert('제목을 입력해주세요.');
                    subject.focus();
                } else if (contents.val() == ''){
                    alert('내용을 입력해주세요.');
                    contents.focus();
                } else {
                   document.form1.submit();
                }

            });
        });
    </script>
@endsection
