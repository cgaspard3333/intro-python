# Construction du site. « make » suffit ; « make dev » pour l'aperçu local.

all: zips
	@php build.php

dev:
	@bash watch.sh

clean:
	@rm -rf web .build
	@$(MAKE) -C files clean

zips:
	@$(MAKE) -C files/

.PHONY: all dev clean zips
