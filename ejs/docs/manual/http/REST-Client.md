# Overview
The EJS REST Client is a powerful facility for working with REST APIs.  With built-in path prefixing, token management, advanced error handling, convenience methods, and a Promise-based architecture, making API requests has never been easier!

Leveraging the strengths of the EJS HTTP Client 'under-the-hood', it is also possible to dig into the details of requests and responses, whether or not the request was successful.

# The RestClient Class
## Synopsis
```javascript
class RestClient {
    constructor(string basePath, string token);
    
    api(string method, string path, Object args, Object headers = {}) : Promise<Response>
    
    get(string path, Object args = {}) : Promise<Response>
    post(string path, Object args = {}) : Promise<Response>
    put(string path, Object args = {}) : Promise<Response>
    delete(string path, Object args = {}) : Promise<Response>

    encodeQuery(Object args = {}) : string
}
```
## Methods

# Examples
**Instantiate RestClient**
```javascript
// Create a RestClient with a base URL and an initial JWT token
let rest = new RestClient('/api/v2', 'Bearer jwt-token-placeholder');
```

**Request Methods**
```javascript
// Make GET request
rest.get('/endpoint');

// Make POST request
rest.post('/endpoint');

// Make PUT request
rest.put('/endpoint');

// Make DELETE request
rest.delete('/endpoint');
```

**Simple Example**
```javascript
// Make a GET request to /users/1
rest.get('/users/1').then(response => {
    let user = response.json();
}).catch(error => {
    console.log(error);
});
```

**Exhaustive Example**
```javascript
// Make a GET request to /foo?foo=bar&bar=foo
rest.get('/foo', {
    foo: 'bar',
    bar: 'foo'
}).then(response => {
    // Successful response (200 <= statusCode < 400)

    // Check result
    if(response.status === 200) {
        console.log('200 OK! It worked!');
    }
    else if(response.status === 204) {
        console.log('204 OK with no body!  It worked!');
    }
    else if(response.status === 304) {
        console.log('304 Redirected!  It worked!');
    }

    // Get response body
    let bodyText = response.text();
    let bodyObj = response.json();
    let bodyBuffer = response.arrayBuffer();
    let bodyBlob = response.blob();

    // Get the original request
    let originalRequest = response.request;

    // Check for a header in the response
    if(response.headers.has('content-length')) {
        // Get the value of a header in the response
        let contentLength = response.headers.get('content-length'); // case-insensitive header names
    }
}).catch(error => {
    // Failed response (status >= 400)

    // Check reason for failure
    switch(error.constructor) {
        // API rejected the request or threw an error (e.g. 500)
        case RestClient.Errors.RestError:
            console.log('Caught RestError: ', error);

            // Check the reason for rejection
            if(error.response.status === 404) {
                console.log('Page not found!');
            }
            else if(error.response.status === 500) {
                console.log('The server threw an error.');
            }

            // Get the body of the response
            let bodyText = error.response.text();
            let bodyObj = error.response.json();
            let bodyBuffer = error.response.arrayBuffer();
            let bodyBlob = error.response.blob();

            break;

        // HTTP request failed (e.g. could not connect to server, CORS error, etc.)
        case RestClient.Errors.NetworkError:
            console.log('Caught NetworkError: ', error);
            break;
    }
});
```