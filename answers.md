1. Assuming that this is only one of the API calls we need to make to this endpoint, and that responses from this external API are slow, we’d like to do some caching of the data on our end. What approach would you suggest to do that? (Feel free to make and then document assumptions about call volume, data expiration, etc. as necessary.)
I'm a little bit tired by now (it's 3.30am) but here we go: 

External API calls are always "slow" and "costly", so the first thing I try to avoid is calling and API on every request.   
In this case, I cached the response from the API on a local cache driver of Laravel. 
We could have that data on our database as well, and create a job to sync the data every x hours. 
To optimize that sync process we could save a checksum/hash of the response payload from the API and compare it every time 
to check if any data has changed, so we dont have to touch the database on every run of that job.  


2. Explain any shortcuts you took to complete the project in the allotted time, and how you would change the code if 
this was a normal assignment as part of your job. 
I used laravel, and based some of the code on some starter kits that comes with vue.js on the frontend using inertia. 
Inertia.js allows me to send data to the frontend without building and API, so its faster. For the UI, I used tailwind, 
and that is usually faster to use too.

For the data processing, I used Laravel Collections (something like lodash for Laravel).


3. We asked you to split up the functionality between the front and back end in a specific way. Would you have preferred a different approach? What other considerations might drive your decision making?
In your email you allowed me to use PHP, so I didn't use Node in the backend :)
It could be a lot slimmer using node, as using laravel was like killing a fly with a cannonball, but configure the tooling, and vue.js from scratch ot would took me ages. 
In other circuntances, i would check with the team what stack would be a better fir for something like this. the culture of the company is a key aspect for taking that decision.

4. If you completed any of the Extra Credit, why did you pick that particular task? If you didn’t, which task would you have picked?
I completed "llow a user to click through to a specific country and show all the data for that country". At first i tought that that was easy and fast, but then I realized that i needed to refactor my code to not repeat the same logic twice, and that took me more time (and energy hehe).
