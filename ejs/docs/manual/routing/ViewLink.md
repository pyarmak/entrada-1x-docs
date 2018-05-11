# View Links
WIP

# Examples
```html
<!-- Link to a Named Route -->
<view-link to="sandbox.index">My Link</view-link>

<!-- Link to a Named Route with custom parameters -->
<view-link to="sandbox.index" :params="{ sandboxId: 3 }">My Link</view-link>

<!-- Link to a standard URL -->
<view-link href="https://google.com">Google Link</view-link>

<!-- When Active -->
<view-link to="sandbox.index" class="view-link-active">My Link</view-link>
<!-- When Child Active -->
<view-link to="sandbox.index" class="view-link-active">My Link</view-link>
<!-- Ignore Child Active -->
<view-link to="sandbox.index" exact="true">My Link</view-link>

<!-- When Error (route not defined) -->
<view-link to="sandbox.typo" class="view-link-error">My Link</view-link>
```

```css
/** Scope Dynamic CSS to a Component **/
.my-component .view-link-active {
    font-weight:bold;
}

.my-component .view-link-error {
    text-decoration:line-through;
}
```