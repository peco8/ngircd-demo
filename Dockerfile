FROM ubuntu:trusty

RUN echo 'version 1.0'

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get -qq update
RUN apt-get -yqq upgrade
RUN apt-get -yqq install supervisor
RUN apt-get -yqq install ngircd

ADD ngircd.conf /etc/ngircd/ngircd.conf
ADD ngircd.motd /etc/ngircd/ngircd.motd

ADD locale /etc/default/locale
ADD supervisor.conf /etc/supervisor/conf.d/ngircd.conf

EXPOSE 6667

CMD ["/usr/bin/supervisord"]
