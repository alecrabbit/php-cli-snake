include ./.make/includes/*

up: docker_up time_current
down: docker_down time_current
restart: echo_restarting docker_down docker_up time_current
test: run_phpunit

time_current:
	@echo "\n$(COMMENT_COLOR) $(shell date) $(STOP_COLOR)\n";

docker_up:
	@-title
	@echo "\n$(INFO_COLOR)Starting...$(STOP_COLOR)\n";
	@docker-compose up -d

docker_down:
	@echo "\n$(WARNING_COLOR)Stopping...$(STOP_COLOR)\n";
	@docker-compose down --remove-orphans

echo_restarting:
	@echo "\n$(COMMENT_COLOR)Restarting...$(STOP_COLOR)";

run_phpunit:
	@echo "\n$(COMMENT_COLOR)Testing...$(STOP_COLOR)\n";
	@docker-compose exec app phpunit

