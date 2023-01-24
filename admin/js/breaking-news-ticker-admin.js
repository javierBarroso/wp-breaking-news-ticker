
var news_count = 1

function add_news(){
    var news_container = document.getElementById('news_container')

    news_count += 1

    var news = document.createElement('div')

    news.classList = 'news-input'

    news.id = 'news-' + news_count

    news.innerHTML = '<input type="text" name="news[]"><input type="button" value="X" onclick="delete_news(\'news-'+news_count+'\')"><br><br>'

    news_container.appendChild(news)
}

function delete_news(id){

    var news = document.getElementById(id)

    news.remove()

}


(function($){
    $(document).on('click', '.remove-slider', function(){
        alert('test');
    })
})(jQuery)