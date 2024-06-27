
# Crewfare Take-Home

## Objective

Thank you for your continued interest in working with Crewfare! Were excited to have the chance to evaluate your technical skills. We have designed this project to allow you to demonstrate the skills needed for a Full Stack Engineer. The task is to create a simple two tier application that fetches data from an external API, processes the data, and displays it in a user-friendly format. This task will evaluate your ability to work with TypeScript, handle API requests, and manipulate and display data.

Please do not spend more than 3-4 hours on this project. We will be asking you to write code to complete the project as well as answer some questions about the code, your approach, and what you might want to do differently in the future.

If you run into any difficulties or have questions about requirements, please feel free to reach out via email at chris@crewfare.com

## Project Requirements

Your project is to create an interface to the country data available at [https://restcountries.com/v3.1/all](https://restcountries.com/v3.1/all). API calls to that external endpoint should happen server-side. The default state of the front-end should be to show the top ten countries by population, in descending order, including the country name, population, capital, and flag. The front-end should allow a user to select a specific region and then see that same data filtered to that specific region. Were not expecting you to style these results beyond displaying a formatted list.

**Extra Credit** - If you have extra time within the 3-4 hour time window weve given to complete the task, weve provided some optional additional objectives. Full Stack Engineers have a breadth of experience that is covered by the core assignment. If you have extra depth in a particular area, this could provide you an opportunity to demonstrate that. (These are not in priority order, even if you finish quickly you probably wont have time to complete more than one.)
1. Add some design flair
2. Allow a user to click through to a specific country and show all the data for that country
3. Update the server side processing to allow additional sorting methods
4. Update the application to allow paging through results (either client-side or server-side)
5. Add a search feature to filter countries by name
6. Build a DDL or ER diagram for a relational database table to store the returned API data

## Post-Coding Questions

Once you have completed the project code, please create a text or markdown document answering the following questions:
1. Assuming that this is only one of the API calls we need to make to this endpoint, and that responses from this external API are slow, wed like to do some caching of the data on our end. What approach would you suggest to do that? (Feel free to make and then document assumptions about call volume, data expiration, etc. as necessary.)
2. Explain any shortcuts you took to complete the project in the allotted time, and how you would change the code if this was a normal assignment as part of your job.
3. We asked you to split up the functionality between the front and back end in a specific way. Would you have preferred a different approach? What other considerations might drive your decision making?
4. If you completed any of the Extra Credit, why did you pick that particular task? If you didnt, which task would you have picked?

## Set up and Deliverables



1. Project Setup:
    1. Use TypeScript for all your code.
    2. Set up your project with npm or yarn.
    3. Use tsconfig.json to configure your TypeScript project.
    4. You can build the backend in straight NodeJS, or select a framework to use on top of that.
    5. Pick any front-end framework you are comfortable with (React, Angular, Vue, etc.
5. Return to us a zip file containing the following:
    1. Your project folder
    2. Instructions on how to run your project locally.
    3. Answers to the post-coding questions

## Evaluation Criteria

1. Code Quality - Is the code clean, organized, and easy to understand? Are TypeScript types used effectively throughout?
2. Functionality - Does the application meet the requirements? Does it handle API calls, data processing, and display the data correctly?
3. User Experience -  Is the application easy to use and visually appealing?
4. Error Handling -  Are errors and loading states managed gracefully?
5. Testing - Are there tests? Do they do anything useful?
6. Documentation: Is the code adequately commented and documented? Were the Post-coding questions answered thoughtfully?

## Submission

Please return your completed assignment within 72 hours. If you need an extension, please reach out to us (we understand life happens). Send the zip file containing your code and documentation to chris@crewfare.com
