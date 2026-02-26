Lab 3B Reflection: AI Assisted Website Iteration
D’Andre Collins • ITWS 1100 • Spring 2026

Overview
In Lab 3B I improved my Lab 3 personal website by collaborating with AI but keeping full control of what shipped. I worked in a dedicated branch (lab3b) and committed after each iteration, so my progress was transparent and recoverable. My constraints stayed consistent throughout: no JavaScript, readable multi line CSS, and semantic HTML.
How I Worked
Start each iteration with a specific goal and constraints written first.
Compare AI suggestions to my existing class names / file paths before passing anything.
Test in browser after each change (desktop + narrow widths), then commit + push.
If AI output was wrong, I treated it like a rough draft and corrected it manually.
Iterations (Prompt → Outcome)
1) Modernized the overall layout (hero + sections + cards) while keeping HTML semantic and CSS organized.
2) Improved navigation clarity by opening Labs/Resume in new tabs (target="_blank" + rel="noopener").
3) Added a headshot area with a placeholder so I can insert a real photo later without changing structure.
4) Content verification step: AI removed the headshot and inserted incorrect projects; I restored the headshot and corrected project content.
5) Added CSS only anchor improvements (better scrolling +: target highlighting) to create interactivity without JavaScript.
6) Readability pass: tightened typography hierarchy (spacing, line-height, readable widths) and ensured image extension matched .png.
7) Simplified the nav by removing “Principles” from the hotbar while keeping the section on the page.
8) Added a “just the beginning”/version note to signal the site will evolve with projects and experience.
9) Accessibility pass: clearer focus-visible styling and support for prefers-reduced-motion.
10) Final cleanup: fixed spacing inconsistencies and reintroduced Principles (not on nav) for balance.
What I Learned
Constraints first = better output.
When I put “no JavaScript” and formatting rules at the top of a prompt, the AI stayed closer to what the assignment allowed.
AI can be confidently wrong.
The incorrect projects / missing headshot iteration taught me to verify facts, filenames, and links instead of trusting the first output.
Small commits reduce risk.
Committing each iteration made it easy to isolate breakages and understand exactly what changed between versions.
Polish matters in portfolio work.
The biggest improvements were readability and consistency (spacing, typography, navigation clarity), and not flashy effects.
Accessibility is real engineering.
Focus states and reduced motion support improved usability without changing the design for most users.
Next Steps
Next, I plan to replace placeholders with real assets (headshot, project screenshots) and expand the Projects section into mini case studies (problem → approach → result) with direct repository links. I’ll keep the same workflow: clear prompts, small testable changes, and clean commits.

