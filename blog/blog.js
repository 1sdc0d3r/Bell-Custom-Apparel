// const articleList = await import("./articles.js").then(res => res.default);

// const URL = 'https://git.heroku.com/bell-custom-apparel.git';
// const URL = 'https://bell-custom-apparel-3a2f1eb4bdea.herokuapp.com';
const URL = 'http://localhost';

const PORT = 3306;
const articleList = await fetch(`${URL}:${PORT}/`).then(resp => resp.json()).catch(err => console.log(err));

// const art = await fetch(`${URL}:${PORT}/2`).then(resp => resp.json()).catch(err => console.log(err));
// console.log(art);

const entryPoint = document.querySelector(".blog");
for (let i = 0; i < articleList.length; i++) {
    const e = articleList[i];
    const card = document.createElement("a");
    card.className = 'card';
    card.href = `/blog/article.html?id=${e.id}`; //! link to article
    const right = document.createElement("div");
    right.className = 'right';

    const title = document.createElement("h1");
    const date = document.createElement("span");
    const author = document.createElement("span");
    author.classList.add("author");
    const snippet = document.createElement("p");
    const img = document.createElement("img");
    img.src = `/images/blog/${e.Img_Url}`;
    img.alt = e.Img_Alt;

    title.textContent = e.Title;
    date.textContent = e.Date;
    author.textContent = e.Author;
    snippet.textContent = e.Snippet;

    right.append(title, author, date, snippet);
    card.append(img, right);

    entryPoint.appendChild(card);
}
