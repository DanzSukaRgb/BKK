function moviel(){
    $('#moviel').html('')
    $.ajax({
        url : 'http://www.omdbapi.com',
        type : 'get',
        dataType : 'json',
        data : {
            'apikey' : '5d8ccc67',
            's' : $('#search-input').val()
        },
        success : function(data){
         if (data.Response == "True"){
                let movies = data.Search
                
            $.each(movies,function(i , datas){
                $('#moviel').append( `
                <div class = "col-md-4">
                    <div class="card mb-3">
                <img src=  " ` + datas.Poster+` "class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">`+datas.Title+`</h5>    
                     <h6 class="card-subtitle mb-2 text-body-secondary">`+datas.Year+`</h6>
                     <a href="#" class="card-link detaill" data-bs-toggle="modal" 
                     data-bs-target="#exampleModal" datas-id="`+ data.imdbID+`">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        `);
            })

        $('#search-input').val('')
         }else{
            $('#moviel').html('<h2 class="text-center">Movie Tidak Ada !</h2>')
         }
        }
    })
 }
$('#search-button').on('click',function(){
 moviel()
})
$('#search-input').on('keyup',function(e){
    if(e.which === 13 ){
        moviel()
    }
})
$('#moviel').on('click' , '.see-detail',function(){
    $.ajax({
        url : 'http://www.omdbapi.com',
        type : 'get',
        dataType : 'json', 
        data ; {
                'apikey' : '5d8ccc67',
        }
    })
})