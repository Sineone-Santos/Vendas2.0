const base_url = '/projects/vendas_2.0';

const app = {
    _routes: {},
    push(path, callback) {
        this._routes[path] = callback
    }
}

app.push('/', renderContent('views/')