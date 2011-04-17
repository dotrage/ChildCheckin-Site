#Required settings
#Set application to the url of the project
set :application, "Child Checkin"
#Set repository is the path to the Git repository to deploy from. Capistrano will ssh into the server,
#so the user specified below must be able to ssh into the server
set :repository,  "git@github.com:dotrage/ChildCheckin-Site.git"
set :server_ip, "184.72.233.166"
set :user, "deploy"
#
#Roles
#Roles are named sets of servers that you can target Capistrano tasks to execute against.
role :web, "#{server_ip}"
role :app, "#{server_ip}"
#
#Optional Settings
#This allows Capistrano to prompt for passwords
default_run_options[:pty] = true
#The following lines tell Capistrano where to deploy the project
set :deploy_to, "/var/www/vhosts/rollcalled.com" # defaults to "/u/apps/#{application}"
set :current_path, "#{deploy_to}/html"
set :releases_path, "#{deploy_to}/releases/"
set :shared_path, "#{deploy_to}/shared/"
#This tells Capistrano that I'm using Git for versioning.
set :scm, :git
#This tells Capistrano that sudo access is not needed to deploy the project.
set :use_sudo, false
#
#And here are the tasks required to deploy a simple project
namespace:deploy do
    task:start do
    end
    task:stop do
    end
    task:finalize_update do
        run "chmod -R g+w #{release_path}"
    end
    task:restart do
    end
   after "deploy:restart" do
         #add any tasks in here that you want to run after the project is deployed
         run "rm -rf #{release_path}.git"
    end
end