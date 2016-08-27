{{ Form::open(['route'=>'contact::feedback', 'class'=>'uk-form']) }}
    <div class="uk-form-row">
        <label class="uk-form-label">Your Name</label>
        <input type="text" class="uk-width-1-1" name="name" placeholder="John Doe" required value="{{ isset($formData) && array_key_exists('name', $formData) ? $formData['name']:'' }}">
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label">Your Email</label>
        <input type="email" class="uk-width-1-1" name="email" placeholder="john@doe.com" required value="{{ isset($formData) && array_key_exists('email', $formData) ? $formData['email']:'' }}">
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label">Subject</label>
        <input type="text" class="uk-width-1-1" name="subject" placeholder="Feedback" required value="{{ isset($formData) && array_key_exists('subject', $formData) ? $formData['subject']:'' }}">
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label">Message</label>
        <textarea class="uk-width-1-1" name="message" rows="4" placeholder="Message" required>{{ isset($formData) && array_key_exists('message', $formData) ? $formData['message']:'' }}</textarea>
    </div>
        <button type="submit" class="uk-button uk-button-success uk-float-right">Send Message</button>
{{ Form::close() }}