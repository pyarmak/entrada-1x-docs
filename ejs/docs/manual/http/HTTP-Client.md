# Introduction
WIP

# The HttpClient Class

## Synopsis
```javascript
class HttpClient 
{
    constructor(credentialsMode = 'default');

    createRequest(string method, string url, string body, Object headers) : Http/Request;
    createResponse(int status, string body, Http/Headers headers, Http/Request request) : Http/Response;

    makeRequest(Http/Request request) : Promise<Http/Response>;

    static Errors: {
        NetworkError: Http/NetworkError
    };

    static createRequest(string method, string url, string body, Object headers) : Http/Request;
    static createResponse(int status, string body, Http/Headers headers, Http/Request request) : Http/Response;
}
```