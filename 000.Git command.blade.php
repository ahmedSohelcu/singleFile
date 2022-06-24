============================================================================================
							Essential Git Commands
============================================================================================
1.git init

2.git config --global user.name "name here"

2.git config --global user.email "email here"

private
--------------------------------------------
3.git config user.name "name here"

4.git config user.email "email here"

5.git config --list

--------------------------------------------
…create a new repository on the command line
--------------------------------------------
echo "# nativePro" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/ahmedSohelcu/nativePro.git
git push -u origin master
------------------------------------------------------


------------------------------------------------------
… OR push an existing repository from the command line
------------------------------------------------------
git remote add origin https://github.com/ahmedSohelcu/nativePro.git
git push -u origin master
------------------------------------------------------


1. Check your information
---------------------------------------------
git config --global --list

2.Add your Git username and set your email
---------------------------------------------
git config --global user.name "YOUR_USERNAME"

3. Then verify that you have the correct username:
---------------------------------------------
git config --global user.name


4.To set your email address, type the following command:
---------------------------------------------
git config --global user.email "your_email_address@example.com"


5.To verify that you entered your email correctly, type:
---------------------------------------------
git config --global user.email


6. Check your information
---------------------------------------------
git config --global --list
