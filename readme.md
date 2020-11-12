# mini-blog 

## Fonctionnement 
1) Se placer dans `server`
2) Taper `node htmlFile.js`
3) Sur votre navigateur entrez l'url : `http://localhost:8000` 

## Serveur 
Génère le fichier `index.html`
```javascript
const http = require("http");
const fs = require('fs').promises;
const host = 'localhost';
const port = 8000;

let indexFile;
const requestListener = function (req, res) {
    res.setHeader("Content-Type", "text/html");
    res.writeHead(200);
    res.end(indexFile);
};

const server = http.createServer(requestListener);

fs.readFile(__dirname + "/index.html")
    .then(contents => {
        indexFile = contents;
        server.listen(port, host, () => {
            console.log(`Server is running on http://${host}:${port}`);
        });
    })
    .catch(err => {
        console.error(`Could not read index.html file: ${err}`);
        process.exit(1);
    });
```


  
  
