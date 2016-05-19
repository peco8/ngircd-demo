# ngircd-demo 
IRC damon demo ( using ngIRCd: a free, portable and lightweight Internet Relay Chat server for small or private networks, developed under the GNU General Public License (GPL).  http://ngircd.barton.de/ ) 

## Running locally

```
$ git clone https://github.com/peco8/ngircd-demo.git
$ cd ngircd-demo
$ docker build --no-cache --tag quickstart-php .
$ docker run -rm -d -p 6667:6667 ngircd-demo
```
Your app should now be running locally.

## Deploying to Arukas

[Install the Arukas CLI.](https://github.com/arukasio/cli)

or If you have docker installed already,
```
docker run --rm -e ARUKAS_JSON_API_TOKEN=<APIT_OKEN> -e ARUKAS_JSON_API_SECRET=<SECRET_KEY> arukasio/arukas run --instances=3 --mem=512 -ports=80:tcp peco8/ngircd-demo
```
## TIPS
If you don't have any cliens to connect, here is the list.

### IRC Client
##### CLI base
- Irssi https://irssi.org/
- Weechat https://weechat.org/

##### Browser based apps
- CIRC https://chrome.google.com/webstore/detail/circ/bebigdkelppomhhjaaianniiifjbgocn
- IRCCloud https://www.irccloud.com

##### Desktop apps

- For Mac
  - Colloquy http://colloquy.info/

- For Windows
  - Limechat http://limechat.net/

### IRCbot
**If you want to let a simple IRC bot run, check out [here.](/)**


## Author

* Toshiki Inami (<t-inami@arukas.io>)

## License

This project is licensed under the terms of the MIT license.

**Continue with this tutorial [here](/).**

