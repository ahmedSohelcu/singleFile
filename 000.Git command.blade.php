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
