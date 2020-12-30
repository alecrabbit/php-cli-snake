include ./.make/includes/*

up: docker_up time_current
down: docker_down time_current

time_current:
	@echo "\n$(COMMENT_COLOR) $(shell date) $(STOP_COLOR)\n";

docker_up:
	@-title
	@echo "\n$(INFO_COLOR)Starting...$(STOP_COLOR)\n";
	@docker-compose up -d

docker_down:
	@echo "\n$(WARNING_COLOR)Stopping...$(STOP_COLOR)\n";
	@docker-compose down --remove-orphans

test:
	@echo "\n$(COMMENT_COLOR)Testing...$(STOP_COLOR)\n";
	@docker-compose exec app phpunit

