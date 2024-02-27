// id, title, author, date, imageUrl, imageAlt, category, tags, snippet, content

const articleList = await import("./articles.js").then(res => res.default);
// const id = new URLSearchParams(window.location.search).get("id");
// const article = articleList.find(e => e.id == id);

// if (!article) window.location = "404.html";

// document.title = article.title + "| Bell Custom Apparel"
const entryPoint = document.querySelector(".blog");


for (let i = 0; i < articleList.length; i++) {
    const e = articleList[i];
    // console.log(e);
    const card = document.createElement("div");
    card.className = 'card';
    // card.href = ; //! link to article
    const right = document.createElement("div");
    right.className = 'right';

    const title = document.createElement("h1");
    const date = document.createElement("span");
    const author = document.createElement("span");
    author.classList.add("author");
    const snippet = document.createElement("p");
    const img = document.createElement("img");
    img.src = `/images/blog/${e.imageUrl}`;
    img.alt = e.imageAlt;

    title.textContent = e.title;
    date.textContent = e.date;
    author.textContent = e.author;
    snippet.textContent = e.snippet;

    right.append(title, author, date, snippet);
    card.append(img, right);

    entryPoint.appendChild(card);
    console.log(e.title)
    console.log(document.querySelector("h1"));
}
