<div class="image__section">
    <div class="image__item" style="background-image: url('/public/images/contact-bg.jpg');">
        <div class="text__section">
            <p>You may contact me here!</p>
        </div>
    </div>
</div>
<form class="form__section" method="POST" action="/contact">
    <div class="message__section">
        <label for="msg">Message</label>
        <textarea id="msg" name="text"></textarea>
    </div>
    <div class="contact__section">
        <label for="name">Name</label>
        <input type="text" id="name" name="name">

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email"> 

        <button type="submit">Submit</button>
    </div>
</form>