.DEFAULT_GOAL := help
.PHONY: $(filter-out vendor node_modules,$(MAKECMDGOALS))

bin = ./vendor/bin

help: ## This help message
	@printf "\033[33mUsage:\033[0m\n  make [target]\n\n\033[33mTargets:\033[0m\n"
	@grep -E '^[-a-zA-Z0-9_\.\/]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[32m%-15s\033[0m %s\n", $$1, $$2}'

phpmd: ## PHP Mess Detection
	@$(bin)/phpmd src/Auburnite/Component/Feag ansi phpmd.xml --cache -vv

phpmd-ci: ## PHP Mess Detection in CI
	@$(bin)/phpmd src/ github phpmd.xml.dist

phpmd-baseline: ## PHP Mess Detection. Generate Baseline
	@$(bin)/phpmd src/ ansi phpmd.xml --generate-baseline

lint: ## PHP, YAML & Twig Syntax Checking
	@$(bin)/parallel-lint -j 10 src/ --no-progress --colors --blame

lint-ci:
	$(bin)/parallel-lint -j 10 src/ --no-progress --colors --checkstyle > report.xml

phpstan: ## PHP Static Analyzer
	@$(bin)/phpstan analyse --error-format=table --configuration=phpstan.neon

phpstan-ci:
	@$(bin)/phpstan analyse --no-progress --error-format=github --configuration=phpstan.neon.dist

phpstan-baseline: ## PHP Static Analyzer. Generate Baseline.
	@$(bin)/phpstan analyse --error-format=table --configuration=phpstan.neon --generate-baseline=phpstan-baseline.neon --allow-empty-baseline

phploc: ## PHP Project Size reporting
	@bin/phploc src
