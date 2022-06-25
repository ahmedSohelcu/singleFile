----------------------------------
Docker install linux
----------------------------------
sudo apt install docker.io
docker --version

----------------------------------
To check Docker status
----------------------------------
sudo systemctl status docker 

----------------------------------
To run/enable Docker 
----------------------------------
sudo systemctl enable --now docker

----------------------------------
To run
----------------------------------
sudo docker run hello-world


----------------------------------
all local images
----------------------------------
sudo docker images
sudo apt-get update

docker run -d -p 80:80 docker/getting-started

-----------------------------------
//Docker desktop
-----------------------------------
download docker desktop (DEB package) from https://docs.docker.com/desktop/linux/install/
cd Download
sudo apt install ./docker-desktop-4.9.1-amd64.deb 

-----------------------------------
apt install neofetch
neofetch
sudo apt install 


Docker command
-----------------------------------
docker run image-name

busybox image
------------------------------------
docker run busybox echo This is Ahmed
docker run busybox ls
