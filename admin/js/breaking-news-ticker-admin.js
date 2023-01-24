
var news_count = 1

function add_news(){
    var news_container = document.getElementById('news-container')

    news_count += 1

    var news = document.createElement('tr');

    news.id = 'news-container-' + news_count

    news.innerHTML = `<th>
                        <label for="news-` + news_count + `">News ` + news_count + `</label>
                    </th>
                    <td>
                        <textarea class="regular-text" name="news[]" id="news-` + news_count + `" cols="30" rows="10"></textarea>
                        <input class="button button-secondary" type="button" value="Delete" onclick="delete_news(\'news-container-` + news_count + `\')">
                    </td>`


    news_container.appendChild(news);
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

